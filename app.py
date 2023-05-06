import joblib
import pandas as pd
from flask import Flask
from flask_restful import Api, Resource
from sklearn.tree import DecisionTreeRegressor

dtr = joblib.load("modello.bin")

maketable = joblib.load("make.bin")
modeltable = joblib.load("model.bin")
checktable = joblib.load("checkmodello.bin")


# create a dataframe from the dictionary

app = Flask(__name__)
api = Api(app)


class MandaPred(Resource):
    def get(self,year,EngineHP,EngineCy,hMPG,cMPG,Make,Mode,TransmissionType,Wheels):

        if((checktable['Make'] == Make).any()) :
            if((checktable['Model'] == Mode).any()) :
                  
                result = checktable.loc[checktable['Model'] == Mode, 'Make'].iloc[0]
                if(result == Make) :
                    marcaid = maketable.loc[maketable['Make'] == Make, 'Marca_encoded']
                    modelid = modeltable.loc[modeltable['Model'] == Mode, 'Model_encoded']

                    data = {'Year': [year],
                    'Engine HP': [EngineHP],
                    'Engine Cylinders': [EngineCy],
                    'highway MPG': [hMPG],
                    'city mpg': [cMPG],
                    'Make': [marcaid],
                    'Model' : [modelid],
                    'Transmission Type': [TransmissionType],
                    'Driven_Wheels': [Wheels],
                    }
                    lol = pd.DataFrame(data)
                    predizione = dtr.predict(lol)
                    return {"predizione": str(predizione[0])}
                else :
                     return {"predizione" : "NO3"}
            else :
                 return {"predizione" : "NO2"}
                     
                  
        else :
             return {"predizione" : "NO1"}
            


        
    
api.add_resource(MandaPred, "/mandapred/<int:year>/<int:EngineHP>/<float:EngineCy>/<int:hMPG>/<int:cMPG>/<string:Make>/<string:Mode>/<int:TransmissionType>/<int:Wheels>")

if __name__ == "__main__":
    app.run(debug=True)