import requests

response = requests.get('http://127.0.0.1:8000/tipos/json').json()



class Node:
    def __init__(self, data):
        self.data = data
        self.left = None
        self.right = None
    

class BST:
    def __init__(self):
        self.root = None

    def add(self,data):
        node = self.root;
        if (node == None):
            self.root = Node(data);
            return;
        else: 
            if(data["rating"] < node.data["rating"]): 
                if(node.left == None): 
                    node.left = Node(data);
                    return;
                elif (node.left != None): 
                    return (node.left);
                
            elif(data["rating"] > node.data["rating"]):
                if node.right == None:
                    node.right = Node(data);
                    return;
                elif (node.right != None):
                    return (node.right);
                
            else: 
                return None;
        
    
    def findMin(self):
        current = self.root
        while current.left != None:
            current = current.left;
        return current.data;
    
    def findMax(self): 
        current = self.root;
        while current.right != None: 
            current = current.right    
        return current.data;
    
    def find(self,data):
        current = self.root
        while current.data["rating"] != data:
            if (data < current.data["rating"]): 
                print(current.data["rating"])
                print(data)
                current = current.left
            else:
                current = current.right            
            if(current == None):
                return None
        return current

    def levelOrder(self): 
        result = []
        Q = []
        if (self.root != None): 
            Q.append(self.root)
            while Q.length > 0:
                node = Q.shift()
                result.append(node.data)
                if (node.left != None): 
                    Q.append(node.left)
                if (node.right != None):
                    Q.append(node.right)            
            return result
        else: 
            return None




array = []
a=[]
aObj = []
def re(a):
  if len(a)<3:
    if len(a) == 1:
    #   print('cuando es I:',a[0])
      array.append(a[0])
    else:
    #   print('cuando es II:',a[0],a[1])
      array.append(a[0])
      array.append(a[1])
    return
#   print('num nodo:',a[len(a)//2])
  array.append(a[len(a)//2])
  
  re(a[:len(a)//2])
  re(a[(len(a)//2)+1:])
  
# print(response)

for x in response["tipos"]:
#     print("=======",x["rating"])
    a.append(x["rating"])

# print(a)
a.sort()
# print(a)
re(a)
print(array)

ratingPizzaList = []
while len(ratingPizzaList)!= len(a):
    for obj in response["tipos"]:
        # print("obj",obj["rating"])
        # print("array",array[0])
        if obj["rating"] == array[0]:
            ratingPizzaList.append(obj)
            a.pop(0)

# print(ratingPizzaList)




bst = BST()

for pizza in ratingPizzaList:
    bst.add(pizza)

inputPizzav = int(input("Inserte el Rating: "))
print(bst.find(2))
print("Max")
print("---------------------------------------------")
print(bst.findMax())
print("Min")
print("---------------------------------------------")
print(bst.findMin())
# print(bst.levelOrder())






