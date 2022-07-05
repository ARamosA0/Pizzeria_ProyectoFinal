from urllib import response
from flask import Flask, jsonify, request, Response
from flask_cors import CORS
from flask_pymongo import PyMongo
from bson import ObjectId, json_util
import requests



import json


app = Flask(__name__)
cors = CORS(app, resources={r"/api/*":{"origins":"*"}})

app.config['MONGO_URI']='mongodb://127.0.0.1:27017/ProyectoFinal'
mongo = PyMongo(app)
res = requests.get('http://127.0.0.1:8000/tipos/json/')  
# app.register_blueprint(main)

@app.route('/')
def index():
    return jsonify({
        "status":True,
        "message":":)"
    })

@app.route('/api/ingredientes', methods=['GET'])
def getIngredientes():
    ingrediente = mongo.db.ingrediente.find()
    response = json_util.dumps(ingrediente)
    
    return Response(response,mimetype='application/json')

@app.route('/api/ingredientes/<id>',methods=['GET'])
def get_ingrediente(id):
    ingrediente = mongo.db.ingrediente.find_one_or_404({'_id':ObjectId(id)})
    response = json_util.dumps(ingrediente)
    return Response(response,mimetype='application/json')


@app.route('/api/ingredientesnombre/<name>',methods=['GET'])
def getIngredienteNombre(name):
    ingrediente = mongo.db.ingrediente.find_one({'nombre':name})
    response = json_util.dumps(ingrediente)
    return Response(response,mimetype='application/json')


@app.route('/api/tiposingrediente', methods=['GET'])
def getTiposIngredientes():
    tipo = mongo.db.tipos_ingrediente.find()
    response = json_util.dumps(tipo)
    return Response(response,mimetype='application/json')

@app.route('/api/tipos', methods=['GET'])
def getTipos():
    tipo = mongo.db.tipo.find()
    # tipoid = mongo.db.tipo.find({},{"_id":1})
    # tipoIngredientes = mongo.db.tipos_ingrediente.find_one({'_id':ObjectId(tipoid)})
    # ingrediente = mongo.db.ingrediente.find()
    # tipoI = tipoIngredientes
    response = json_util.dumps(tipo)
    return Response(response,mimetype='application/json')

@app.route('/api/tipos/<id>', methods=['GET'])
def getTiposId(id):
    tipo = mongo.db.tipo.find_one_or_404({'_id':ObjectId(id)})
    # tipoid = mongo.db.tipo.find({},{"_id":1})
    # tipoIngredientes = mongo.db.tipos_ingrediente.find_one({'_id':ObjectId(tipoid)})
    # ingrediente = mongo.db.ingrediente.find()
    # tipoI = tipoIngredientes
    response = json_util.dumps(tipo)
    return Response(response,mimetype='application/json')
    

# @app.route('/api/ing', methods=['POST'])
# def getInfo():
#     ing = request.form['nm']
#     response = json_util.dumps({
#         "ingredientes":[],
#         "tamano":"",
#         "ratig":0,
#     })
#     return Response(response,mimetype='application/json')


@app.route('/api/producto/', methods=['POST'])
def setProducto():
    tipo_id = request.json['tipo_id']
    tamano = request.json['tamano']
    precio = request.json['precio']
    if tipo_id and tamano and precio:
        id = mongo.db.producto.insert_one(
            {
            "tipo_id":tipo_id,
            "tamano":tamano,
            "precio":precio
            }
        )
        response = jsonify({
            '_id':str(id.inserted_id),
            'tipo_id':tipo_id,
            'tamano':tamano,
            'precio':precio
        })
        return response

@app.route('/api/producto', methods=['GET'])
def getProducto():
    producto = mongo.db.producto.find()
    response = json_util.dumps(producto)
    return Response(response, mimetype="application/json")

@app.route('/api/producto/<id>', methods=['GET'])
def getProductoId(id):
    producto = mongo.db.producto.find_one_or_404({'_id':ObjectId(id)})
    response = json_util.dumps(producto)
    return Response(response, mimetype="application/json")

@app.route('/api/pedido', methods=['GET'])
def getPedido():
    pedido = mongo.db.pedido.find()
    response = json_util.dumps(pedido)
    return Response(response, mimetype="application/json")

@app.route('/api/pedido', methods=['POST'])
def setPedido():
    idProducto = request.json['idProducto']
    if idProducto:
        id = mongo.db.pedido.insert_one(
            {
            "idProducto":idProducto, 
            }
        )
        response = jsonify({
            "_id":str(id),
            "idProducto":idProducto
        })
        return response


if __name__ == "__main__":
    app.run(debug=True)