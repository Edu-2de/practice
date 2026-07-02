import mysql.connector
from mysql.connector import Error

def testar_conexao():
    try:
        # Tenta conectar no banco (usuário 'root', sem senha é o padrão local)
        connection = mysql.connector.connect(
            host='localhost',
            user='root',
            password=''
        )

        if connection.is_connected():
            db_info = connection.get_server_info()
            print(f"SUCESSO! Conectado ao MariaDB versão {db_info}")
            print("Seu ambiente de desenvolvimento está 100% funcional.")

    except Error as e:
        print(f"Erro ao conectar: {e}")
        print("Dica: Verifique se você rodou 'mysqld --console' no terminal")

    finally:
        if 'connection' in locals() and connection.is_connected():
            connection.close()

if __name__ == "__main__":
    testar_conexao()
