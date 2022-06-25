from flask import Flask, jsonify, request, Response
from flask_pymongo import PyMongo
from bson import ObjectId, json_util
from bson import objectid



import json


app = Flask(__name__)

app.config['MONGO_URI']='mongodb://127.0.0.1:27017/ProyectoFinal'
mongo = PyMongo(app)
    
# app.register_blueprint(main)

@app.route('/')
def index():
    return jsonify({
        "status":True,
        "message":":)"
    })

@app.route('/ingredientes', methods=['GET'])
def getIngredientes():
    ingrediente = mongo.db.ingrediente.find()
    response = json_util.dumps(ingrediente)
    
    return Response(response,mimetype='application/json')

@app.route('/ingredientes/<id>',methods=['GET'])
def get_ingrediente(id):
    ingrediente = mongo.db.ingrediente.find_one({'_id':ObjectId(id)})
    response = json_util.dumps(ingrediente)
    return Response(response,mimetype='application/json')

@app.route('/tipos', methods=['GET'])
def getTipos():
    tipo = mongo.db.tipo.find()
    response = json_util.dumps(tipo)
    print(tipo)
    
    return Response(response,mimetype='application/json')



if __name__ == "__main__":
    app.run(debug=True)