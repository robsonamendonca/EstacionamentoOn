import sqlite3
import os
import subprocess

db_path = 'app/database/database.sqlite'

# Ensure directory exists
os.makedirs(os.path.dirname(db_path), exist_ok=True)

conn = sqlite3.connect(db_path)
cursor = conn.cursor()

# Create Tables
cursor.execute('''
CREATE TABLE IF NOT EXISTS Usuarios (
    Id INTEGER PRIMARY KEY AUTOINCREMENT,
    Usuario TEXT NOT NULL,
    Senha TEXT NOT NULL
)
''')

cursor.execute('''
CREATE TABLE IF NOT EXISTS Veiculos (
    Id INTEGER PRIMARY KEY AUTOINCREMENT,
    Placa TEXT NOT NULL,
    Modelo TEXT,
    Cor TEXT,
    DataEntrada DATETIME NOT NULL,
    DataSaida DATETIME,
    ValorPago DECIMAL(10,2),
    Status TEXT NOT NULL
)
''')

# Check if admin exists
cursor.execute("SELECT COUNT(*) FROM Usuarios WHERE Usuario = 'admin'")
if cursor.fetchone()[0] == 0:
    try:
        # Generate hash using PHP
        hash_output = subprocess.check_output(['php', '-r', 'echo password_hash("admin", PASSWORD_DEFAULT);']).decode('utf-8').strip()
        if not hash_output:
            raise Exception("Empty hash returned from PHP")
            
        cursor.execute("INSERT INTO Usuarios (Usuario, Senha) VALUES (?, ?)", ('admin', hash_output))
        print("Admin user created.")
    except Exception as e:
        print(f"Failed to generate hash or insert user: {e}")
else:
    print("Admin user already exists.")

conn.commit()
conn.close()
print("Database setup complete via Python.")
