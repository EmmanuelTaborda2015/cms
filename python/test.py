import unittest
from flask.ext.testing import TestCase
from flask.ext.login import current_user
from project import app, db
from project.models import User, BlogPost


class BaseTestCase(TestCase):

    def create_app(self):
        app.config.from_object('config.TestConfig')
        return app

    def setUp(self):
        db.create_all()
        db.session.add(User("admin", "admin@admin.com", "admin"))
        db.session.add(BlogPost("Test post", "This is a test. Only a test", "admin"))
        db.session.commit()

    def tearDown(self):
        db.session.remove()
        db.drop_all()


class FlaskTest(BaseTestCase):

    # Ensure that flask was set up correctly
    def test_index(self):
        response = self.client.get('/login', content_type = 'html/text')
        self.assertEqual(response.status_code, 200)

    #Ensure that the main page requires login
    def test_main_requires_login(self):
        response = self.client.get('/', follow_redirects = True)
        self.assertIn(b'Please log in to access this page.', response.data)

    # Ensure that posts show up on the main page
    def test_post_show_up(self):
        response = self.client.post('/login', data = dict(username = "admin", password = "admin"), follow_redirects = True)
        # Hardcoded data from database
        self.assertIn(b'This is a test. Only a test', response.data)


class UsersViewsTests(BaseTestCase):

    # Ensure that login page loads correctly
    def test_login_page_loads(self):
        response = self.client.get('/login', content_type = 'html/text')
        self.assertTrue(b'Please login' in response.data)

    # Ensure login behaves correctly given correct credentials
    def test_correct_login(self):
        with self.client:
            response = self.client.post('/login', data = dict(username = "admin", password = "admin"), follow_redirects = True)
            self.assertIn(b'You were logged in!', response.data)
            # Test Flask-Login methods
            self.assertTrue(current_user.name == "admin")
            self.assertTrue(current_user.is_active())

    # Ensure login behaves correctly given incorrect credentials
    def test_incorrect_login(self):
        response = self.client.post('/login', data = dict(username = "wrong", password = "wrong"), follow_redirects = True)
        self.assertIn(b'Invalid credentials. Please try again', response.data)

    # Ensure logout behaves
    def test_logout(self):
        with self.client:
            self.client.post('/login', data = dict(username = "admin", password = "admin"), follow_redirects = True)
            response = self.client.get('/logout', follow_redirects = True)
            self.assertIn(b'You were logged out!', response.data)
            # Test Flask-Login methods
            self.assertFalse(current_user.is_active())

    #Ensure that logout page requires login
    def test_logout_requires_login(self):
        response = self.client.get('/logout', follow_redirects = True)
        self.assertIn(b'Please log in to access this page.', response.data)

    # Ensure user can register
    def test_user_registration(self):
        with self.client:
            response = self.client.post('/register', data = dict(username = "test_username", email = "email@test.com",
                                                                 password = "password", confirm = "password"), follow_redirects = True)
            self.assertIn(b'Welcome to Flask!', response.data)
            # Test Flask-Login methods
            self.assertTrue(current_user.name == "test_username")
            self.assertTrue(current_user.is_active())


if __name__ == '__main__':
    unittest.main()