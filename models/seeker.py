import requests
from bs4 import BeautifulSoup
from tabulate import tabulate
import time

url = 'http://167.114.113.144/buscador/Mostrar-informacion'  # Reemplaza con la URL correcta de tu endpoint
datos = {'dni': '40041222'}

response = requests.post(url, data=datos)

if response.status_code == 200:
    # Obtener el contenido HTML de la respuesta
    contenido_html = response.text

    # Crear un objeto BeautifulSoup para analizar el HTML
    soup = BeautifulSoup(contenido_html, 'html.parser')

    # Encontrar el elemento h5 con la clase "mb-0 fw-700 text-center mt-3"
    elemento_h5 = soup.find('h5', class_='mb-0 fw-700 text-center mt-3')

    if elemento_h5:
        dir = []
        # Eliminar las etiquetas <small> dentro del elemento h5
        for small in elemento_h5('small'):
            dir.append(small.text)
            small.decompose()
            pass

        # Obtener el texto del elemento h5
        nombres = elemento_h5.get_text(strip=True)

        # Datos Seeker
        print("==== Consultas Seeker ====")
        print(f"Nombres y Apellidos: {nombres}")
        print(f"Dirección: {dir[0]}")
        print(f"Distrito de residencia: {dir[1]}")
    else:
        print('No se encontró el elemento h5 con la clase especificada.')

    
    ###################### Datos ########################
    tabla = soup.find('table', class_='table m-0')

    if tabla:
        # Encontrar todos los elementos <td> dentro de la tabla
        elementos_td = tabla.find_all('td')

        # Obtener el texto de cada elemento <td>
        datos = [td.get_text(strip=True) for td in elementos_td]

        data_dni = []
        cont = 0
        for i in range(1, len(datos), 2):
            data_dni.append(datos[i])

        print(f"Fecha de Nacimiento: {data_dni[0]}")
        print(f"Lugar de Nacimiento: {data_dni[1]}")
        print(f"Estado Civil: {data_dni[2]}")
        print(f"Sexo: {data_dni[3]}")
        print(f"Padre: {data_dni[4]}")
        print(f"Madre: {data_dni[5]}")

    ####################### Celulares #########################

    # Encontrar la tabla con la clase "table table-bordered table-hover m-0"
    tabla = soup.find('table', class_='table table-bordered table-hover m-0')

    if tabla:
        # Encontrar todos los elementos <td> dentro de la tabla
        elementos_td = tabla.find_all('td')

        # Obtener el texto de cada elemento <td>
        datos = [td.get_text(strip=True) for td in elementos_td]

        # Imprimir los datos obtenidos
        # for dato in datos:
            # print(dato)

        # Obtenemos los celulares
        celulares = []
        cont = 0
        for i in range(1, len(datos), 5):
            cont += 1
            cell = datos[i]
            # print(f"Celular {cont}: {cell}")
            celulares.append(datos[i])

        # Obtenemos los Operadores
        operadores = []
        cont = 0
        for i in range(2, len(datos), 5):
            cont += 1
            operador = datos[i]
            # print(f"Operador {cont}: {operador}")
            operadores.append(datos[i])

        # Obtenemos los Periodos
        periodos = []
        cont = 0
        for i in range(3, len(datos), 5):
            cont += 1
            periodo = datos[i]
            # print(f"Periodo {cont}: {periodo}")
            periodos.append(datos[i])

        print("== Números de celular ==")

        matriz_celulares = []
        for i in range(0, len(celulares)):
            nueva_fila = [celulares[i], operadores[i], periodos[i]]
            matriz_celulares.append(nueva_fila)

        tabla = tabulate(matriz_celulares, headers=['Número', 'Operador', 'Periodo'], tablefmt="fancy_grid")
        print(tabla)
    else:
        print('No se encontró la tabla con la clase especificada.')

    ####################### Vehiculos #########################
    tablas = soup.find_all('table', class_='table m-0')

    if len(tablas) >= 4:
        # Obtener la cuarta tabla
        tabla = tablas[3]

        # Encontrar todos los elementos <td> dentro de la tabla
        elementos_td = tabla.find_all('td')

        # Obtener el texto de cada elemento <td>
        datos = [td.get_text(strip=True) for td in elementos_td]

        # Obtenemos las marcas
        Marcas = []
        for i in range(0, len(datos), 7):
            Marcas.append(datos[i])

        # Obtenemos las Placas
        Placas = []
        for i in range(1, len(datos), 7):
            Placas.append(datos[i])

        # Obtenemos las Clases
        Clases = []
        for i in range(2, len(datos), 7):
            Clases.append(datos[i])

        # Obtenemos las Titulares 1
        Titulares1 = []
        for i in range(4, len(datos), 7):
            Titulares1.append(datos[i])

        # Obtenemos las Titulares 2
        Titulares2 = []
        for i in range(5, len(datos), 7):
            Titulares2.append(datos[i])

        # Obtenemos los colores
        Colores = []
        for i in range(6, len(datos), 7):
            Colores.append(datos[i])

        matriz_vehiculos = []
        for i in range(0, len(Marcas)):
            nueva_fila = [Marcas[i], Placas[i], Clases[i], Titulares1[i], Titulares2[i], Colores[i]]
            matriz_vehiculos.append(nueva_fila)

        tabla = tabulate(matriz_vehiculos, headers=['Marca', 'Placa', 'Clase', 'Titular 1', 'Titular 2', 'Color'], tablefmt="fancy_grid", numalign="center")
        print(tabla)
    else:
        print('No se encontraron suficientes tablas con la clase especificada.')

    ####################### Riesgos #########################
    tablas = soup.find_all('table', class_='table m-0')

    if len(tablas) >= 5:
        # Obtener la cuarta tabla
        tabla = tablas[4]

        # Encontrar todos los elementos <td> dentro de la tabla
        elementos_td = tabla.find_all('td')

        # Obtener el texto de cada elemento <td>
        datos = [td.get_text(strip=True) for td in elementos_td]

        matriz_riesgos = [[datos[0], datos[1], datos[2], datos[3], datos[4], datos[5], datos[6], datos[7]]]
        tabla = tabulate(matriz_riesgos, headers=['Codigo SBS', 'Fecha Reporte', 'N° Entidades', 'OK', 'CPP', 'DEF', 'DUD', 'PER'], tablefmt="fancy_grid")
        print(tabla)
    else:
        print('No se encontraron suficientes tablas con la clase especificada.')


    ####################### BANCOS #########################
    time.sleep(2)
    tablas = soup.find_all('table', class_='table m-0')

    if len(tablas) >= 7:
        print("Entra aca")
        # Obtener la cuarta tabla
        tabla = tablas[6]

        # Encontrar todos los elementos <td> dentro de la tabla
        elementos_td = tabla.find_all('td')

        # Obtener el texto de cada elemento <td>
        datos = [td.get_text(strip=True) for td in elementos_td]

        # Obtenemos las Nombre del Banco
        NombresBancos = []
        for i in range(0, len(datos), 4):
            datos[i] = f"{datos[i]}".replace("�", "Ú").replace("S A A", "S.A.A").replace("S A", "S.A")
            NombresBancos.append(datos[i])
            # print(NombresBancos)

        # Obtenemos el saldo
        Saldos = []
        for i in range(1, len(datos), 4):
            Saldos.append(datos[i])
            #print(Saldos)

        # Obtenemos la clasificación
        Clasi = []
        for i in range(2, len(datos), 4):
            Clasi.append(datos[i])

        # Obtenemos la condición
        Cond = []
        for i in range(3, len(datos), 4):
            Cond.append(datos[i])

        matriz_vehiculos = []
        for i in range(0, len(Marcas)):
            nueva_fila = [NombresBancos[i], Saldos[i], Clasi[i], Cond[i]]
            matriz_vehiculos.append(nueva_fila)

        tabla = tabulate(matriz_vehiculos, headers=['Entidad', 'Saldo', 'Clasificación', 'Condición'], tablefmt="fancy_grid", numalign="center")
        print(tabla)
    else:
        print('No se encontraron suficientes tablas con la clase especificada.')
    
else:
    print('Ocurrió un error en el POST. Código de respuesta:', response.status_code)