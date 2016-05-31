from flask.ext.script import Manager
# Database history
from flask.ext.migrate import Migrate, MigrateCommand
#import os

from project import app, db

#app.config.from_object(os.environ['APP_SETTINGS'])
app.config.from_object('config.DevelopmentConfig')

migrate = Migrate(app, db)
manager = Manager(app)

manager.add_command('db', MigrateCommand)

if __name__ == '__main__':
    manager.run()

    # List of all migrate commands
    #  python manage.py db --h

    #  On cmd, in the app folder: python manage.py db init
    # python manage.py db migrate
    # python manage.py db upgrade

    # History of all migrations
    # python manage.py db history

    # Rollbacks are doing by downgrade
    # python manage.py db downgrade -1
    # Rollback one decision
    # python manage.py db downgrade <migration_id>
    # Rollback before the migration id

    # python manage.py runserver