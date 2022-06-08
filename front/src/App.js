import 'bootstrap/dist/css/bootstrap.min.css';
import './App.css';
import React, {useState} from "react";
import Button from "./components/Button";
import Table from "./components/Table";
import axios from 'axios';
import 'bootstrap/dist/js/bootstrap.bundle.min';

function App() {

    const [height, setHeight] = useState("");
    const [width, setWidth] = useState("");
    const [arrayType, setArrayType] = useState("");
    const array = localStorage.getItem('arrayString');

    const updateHeight = (event) => {
        setHeight(event.target.value);
    };
    const updateWidth = (event) => {
        setWidth(event.target.value);
    };
    const updateArrayType = (event) => {
        setArrayType(event.target.value);
    };

    function axiosRequest(actionType){

        const promise = axios.post("http://localhost:8001/index.php",
            "request=" + JSON.stringify({
                actionType : actionType,
                arrayType : arrayType,
                height : height,
                width : width}),
            {
                headers : {
                    'Content-Type' : 'application/x-www-form-urlencoded'
                }
            })
        return promise.then((response) => response.data);
    }


    const sortHandler = () => {
        if(!arrayType || !height || !width){
            alert("Please, enter all fields");
            return;
        }

        axiosRequest("pageWrite")
            .then(data => {
                localStorage.setItem('arrayString', data);
            })
            .catch(err => {
                alert(err);
            });
    }

    const downloadFileHandler = () => {
        if(!arrayType || !height || !width){
            alert("Please, enter all fields");
            return;
        }

        axiosRequest("downloadFile")
            .then(data => {
                window.location = data;
            })
            .catch(err => {
                alert(err);
            });
    }

    const writeDBHandler = () => {
        if(!arrayType || !height || !width){
            alert("Please, enter all fields");
            return;
        }

        axiosRequest("writeDB")
            .catch(err => {
                alert(err);
            })
    }

    return (
    <div className="App">
        <form>
            <input className="numbers" type="number" min="1" value={width} onChange={updateWidth} placeholder={"Width"}></input><br/>
            <input className="numbers" type="number" min="1" value={height} onChange={updateHeight} placeholder={"Height"}></input><br/>
            <select onChange={updateArrayType}>
                <option value="diagonal">Diagonal</option>
                <option value="horizontal">Horizontal</option>
                <option value="snail">Snail</option>
                <option value="snake">Snake</option>
                <option value="vertical">Vertical</option>
            </select><br/>
            <Button handler={sortHandler} name="Sort" />
            <Button handler={downloadFileHandler} name="Download file" />
            <Button handler={writeDBHandler} name="Write to DB" />
        </form>
        <Table array={array}  />
    </div>
  );
}

export default App;
