#Importamos la librería pandas que se menciono anteriormente 
import pandas as pd
from sklearn.feature_extraction.text import TfidfVectorizer
import matplotlib.pyplot as plt
from sklearn.metrics.pairwise import linear_kernel
#Ahora instancias los valores del archivo csv 
Df=pd.read_csv("./content/GBvideos.csv")
#Procedemos a calcular la cantidad de asientos del archivo (filas)
print (len(Df.index)) 

# se seleccionará el 1%
df = Df.sample(frac=0.001)
# reseteamos los índices dado que elegimos una fracción de los datos
df = df.reset_index(drop=True)
# para obtener el número de filas y columnas 
print (df.shape)
# y podemos comparar con el proceso inicial (que no separa el 1%)
print (Df.shape)
# 38916 filas contra los 39 filas
print ()
#Veamos el contenido del 1%
print (df['tags'].head())
#Vamos a limpiar los daros para eliminar los signos de puntuación
#para eso usaremos la librería "string" y reemplazamos los símbolos de puntuación 
#por un espacio en blanco
import string
df['nuevotag'] = df['tags'].str.replace('[{}]'.format(string.punctuation), ' ')
print ()
print(df['nuevotag'].head())



tfidf = TfidfVectorizer(stop_words='english')
#todo lo que no tenga un dato se va llenar con espacios vacíos
df['nuevotag']=df['nuevotag'].fillna('')
tfidf_matrix = tfidf.fit_transform(df['nuevotag'])
#imprimimos todas las palabras que se encontraron en los textos
#esto es todo lo que se usa para describir el número de videos que están en mi muestra
print (tfidf.vocabulary_)


print (len(tfidf.vocabulary_))
#para ver la cantidad de videos y las palabras usadas para su descripción tenemos
print (tfidf_matrix.shape)



print(f'{"palabras":14} | {"ocurrencia"} ')
print(f'{"--------":14} | {"----------"} ')
row_format ="{:>15}" * (len(tfidf.vocabulary_) + 1)
cont = 0
for word,occurrences  in tfidf.vocabulary_.items():
  print(f'{word:14} | {occurrences} ')
  cont = cont + 1
  if (cont == 5):
    break
print(f'{".":14} | {"."} ')
print(f'{".":14} | {"."} ')
print(f'{".":14} | {"."} ')
#solo mostramos las 5 primeras, para hacernos una idea de cómo se ven los datos 
#al momento en una tabla de frecuencia



plt.bar(tfidf.vocabulary_.keys(), tfidf.vocabulary_.values(), 10)
plt.show()


cosine_sim = linear_kernel(tfidf_matrix,tfidf_matrix )
#Se usará un indice para comparar el título con el índice de la película
#que va ser una serie de pandas, específicamente pd.Series 
#que es una columna de excel (osea una lista).
#
#Esta lista va depender del indice, recordemos que se redujo al 1%
#para no trabajar con todos los datos
indices = pd.Series(df.index, index=df['title']).drop_duplicates()
#ahora se trabajará con la función que recibirá 
#de parámetro el título de la película y la similaridad coseno

def get_recommendations(title, cosine_sim=cosine_sim):
    indicex = indices[title]
    sim_scores = list(enumerate(cosine_sim[indicex]))
    sim_scores = sorted(sim_scores, key=lambda x: x[1], reverse=True)
    #acá se van a escribir los 4 scores mas populares
    sim_scores = sim_scores[1:5]
    movie_indices = [i[0] for i in sim_scores]
    return df['title'].iloc[movie_indices]


titulo = str(df.iloc[3]['title'])
print ("Tu seleccionaste '" + titulo + "' y tus recomendaciones")
print ()
print ("==============================",get_recommendations(titulo))