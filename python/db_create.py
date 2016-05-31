from project import db
#from project.models import BlogPost


# Create the database and db tables
db.create_all()

# Insert
#db.session.add(BlogPost("Good", "I\'m good"))
#db.session.add(BlogPost("Well", "I\'m well"))
#db.session.add(BlogPost("Flask", "discoverflask.com"))
#db.session.add(BlogPost("Postgres", "We setup a local postgres instance"))

# Commit the changes
db.session.commit()