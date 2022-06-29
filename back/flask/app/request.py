import requests
import json

res = requests.get('http://127.0.0.1:8000/tipos/json/')

resJson = json.loads(res.text)
for i in range(len(resJson["tipos"])):
    print(resJson["tipos"][i]["_id"])