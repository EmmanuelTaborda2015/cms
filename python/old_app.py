from flask import Flask, render_template, redirect, url_for, request, session, flash
from flask.ext.sqlalchemy import SQLAlchemy
from functools import wraps

# import sqlite3

from flask.ext.bcrypt import Bcrypt

# Create the application object
app = Flask(__name__)
bcrypt = Bcrypt(app)


# Configuration from config.py
app.config.from_object('config.DevelopmentConfig')

# export APP_SETTINGS="config.DevelopmentConfig"
# Configuration from os
#import os
#app.config.from_object(os.environ['APP_SETTINGS'])


# Create the sqlalchemy object
db = SQLAlchemy(app)
# Import the models before create the database
from project.models import  *


# Login required decorator
def login_required(f):
    @wraps(f)
    def wrap(*args, **kwargs):
        if 'logged_in' in session:
            return f(*args, **kwargs)
        else:
            flash('You need to login first.')
            return redirect(url_for('login'))
    return wrap


# We are not to use sqlite3
#def connect_db():
#    return sqlite3.connect('posts.db')


# Define main route
@app.route('/')
@login_required
def home():

    posts = db.session.query(BlogPost).all()

    # Manage Database with sqlite

    # g is an specific object from flask that store the database connections
    #g.db = connect_db()
    #cursor = g.db.execute('select * from posts')

    #posts = []
    # Fetchall return a list of tuples
    #for row in cursor.fetchall():
    #    posts.append(dict(title = row[1], description = row[2]))
    # Compression
    #posts = [dict(title = row[1], description = row[2]) for row in cursor.fetchall()]

    #g.db.close()


    return render_template('index.html', posts = posts)

@app.route('/welcome')
def welcome():
    return render_template('welcome.html')

@app.route('/login', methods = ['GET', 'POST'])
def login():
    error = None
    if request.method == 'POST':
        if request.form['username'] != 'admin' or request.form['password'] != 'admin':
            error = 'Invalid credentials. Please try again'
        else:
            session['logged_in'] = True
            flash('You were just logged in!')
            return redirect(url_for('home'))
    return render_template('login.html', error = error)

@app.route('/logout')
@login_required
def logout():
    session.pop('logged_in', None)
    flash('You were just logged out!')
    return redirect(url_for('welcome'))


if __name__ == '__main__':
    app.run()