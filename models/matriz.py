from tabulate import tabulate

matriz = [['Hugo', 50, 'México'], ['Karla', 30, 'Alemania'], ['Lus', 65, 'Argentina']]
tabla = tabulate(matriz, headers=['Nombre', 'Edad', 'Pais'], tablefmt="fancy_grid", numalign="left")
print(tabla)