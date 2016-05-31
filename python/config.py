#import os

# Default config
class BaseConfig(object):
    DEBUG = False
    # Secret key generated by os.urandom(24)
    SECRET_KEY = '%)\x17\xe1\xbc\xdd\x19~\xcb\xd4\xac;Ai`\x9b\xd3L\xce(+\x82\xe7F'
    #SQLALCHEMY_DATABASE_URI = 'sqlite:///posts.db'
    SQLALCHEMY_DATABASE_URI = "postgresql://postgres:admin@localhost/discover_flask_dev"
    #export DATABASE_URL="postgresql://localhost/discover_flask_dev"
    #SQLALCHEMY_DATABASE_URI = os.environ['DATABASE_URL']

class TestConfig(BaseConfig):
    DEBUG = True
    TESTING = True
    WTF_CSRF_ENABLED = False
    SQLALCHEMY_DATABASE_URI = 'sqlite:///:memory:'

class DevelopmentConfig(BaseConfig):
    DEBUG = True

class ProductionConfig(BaseConfig):
    DEBUG = False