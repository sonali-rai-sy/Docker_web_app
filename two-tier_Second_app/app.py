from flask import Flask, request, jsonify
from flask_mysqldb import MySQL

app = Flask(__name__)

# DB CONFIG (IMPORTANT for Docker networking)
app.config['MYSQL_HOST'] = 'mysql'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = 'admin'
app.config['MYSQL_DB'] = 'appdb'

mysql = MySQL(app)

@app.route('/')
def home():
    return "Flask MySQL App Running"

@app.route('/add', methods=['POST'])
def add_user():
    data = request.json
    name = data['name']
    email = data['email']

    cur = mysql.connection.cursor()
    cur.execute("INSERT INTO users(name,email) VALUES(%s,%s)", (name, email))
    mysql.connection.commit()
    cur.close()

    return jsonify({"message": "User added successfully"})

@app.route('/users')
def users():
    cur = mysql.connection.cursor()
    cur.execute("SELECT * FROM users")
    data = cur.fetchall()
    cur.close()

    return jsonify(data)

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000)
