# coding:utf-8


# Imports

from flask import Flask
from flask.ext.sqlalchemy import SQLAlchemy
from flask_bcrypt import (Bcrypt,
                              check_password_hash,
                              generate_password_hash,
                              PY3)
from flask.ext.login import LoginManager
#import os


# Config

app = Flask(__name__)
bcrypt = Bcrypt(app)
login_manager = LoginManager()
login_manager.init_app(app)
app.config.from_object('config.DevelopmentConfig')
db = SQLAlchemy(app)


# Register our blueprint

from project.users.views import users_blueprint
from project.home.views import home_blueprint
app.register_blueprint(users_blueprint)
app.register_blueprint(home_blueprint)


# User login

from .models import User
login_manager.login_view = "users.login"

#Store user id in the session
@login_manager.user_loader
def load_user(user_id):
    return User.query.filter(User.id == int(user_id)).first()