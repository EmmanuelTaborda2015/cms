# coding:utf-8


from project import db
from project.models import User


# Insert data
db.session.add(User("test", "test@test.com", "test"))
db.session.add(User("admin", "admin@admin.com", "admin"))

# Commit the changes
db.session.commit()