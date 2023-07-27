import requests
import json

url = 'https://dashboard-b.scrall.cc/v1/consultas/reniec/premium/dni'  # Reemplaza con la URL correcta de tu endpoint

# Crear el JSON para enviar en la solicitud POST
data = {
    'dni': "40041222",
    'token': "03AL8dmw909L2f4Nqzda_Av68P3IMwMtLUZq90QEg2_KxWxcrCubdDTlfjOqOdN_ssmc3zGBbeSgjOSFuVfTYCYHZ6cVf0E3i9GVS4tf6KL_Z_GdEyVbNea6r6aTvWT6LhPbumZiHXa9JieKvXIonp3B3QcPzMdIf9ZU-CF4d7xl57OD4AvzKZsyWbiMZjsIQhqNIA8hiqax3uU4MZQgzx8KigTPIF7V7ODwWF_gxfl5wWgVPfPnp5kfiR67LmALiixMHk2YfJdzmVgjYp5HCszTWIiHhw9VB0e7lz0RAog_b5zNwQE4MwBCL3xV6SfPq-NmNQQOo1nr-qaDxgReE9pReoX3Kdns-TV_5Vm9XHJ9QxB9mogHXV-mNjDpR8SvCjk2xRtgjvhpisFeqtBCQJgWCD49HP4ELl53KN7meDYnXNdRheqTELvNt0tOnDYGXVnpjFe96hQhAz7Nw16Exzh94EvjZv4PPu7m702-joj0-AZzvVFht-HPiBNduK3ZTL5EX_7CPfvyR19DZZ4VuxBfNagXEcmUZ1VplxIy_xUoRKQpRT8hp873c"
}

# Convertir el JSON a formato de texto
json_data = json.dumps(data)

# Configurar las cabeceras de la solicitud POST
headers = {'Content-Type': 'application/json'}

# Hacer la solicitud POST
response = requests.post(url, data=json_data, headers=headers)

if response.status_code == 200:
    # Obtener la respuesta en formato JSON
    json_response = response.json()

    # Imprimir la respuesta obtenida
    print(json_response)
else:
    print('Ocurrió un error en la solicitud POST. Código de respuesta:', response.status_code)
