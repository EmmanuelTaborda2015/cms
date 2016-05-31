import sqlite3

with sqlite3.connect("sample.db") as connection:
    cursor = connection.cursor()
    #cursor.execute("""DROP TABLE posts""")
    #cursor.execute("DROP TABLE posts")
    cursor.execute("""CREATE TABLE posts(title TEXT, description TEXT)""")
    #cursor.execute("CREATE TABLE posts(title TEXT, description TEXT)")
    cursor.execute('INSERT INTO posts VALUES("Good", "I\'m good.")')
    cursor.execute('INSERT INTO posts VALUES("Well", "I\'m well.")')