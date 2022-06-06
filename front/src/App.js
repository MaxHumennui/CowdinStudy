import 'bootstrap/dist/css/bootstrap.min.css';
import './App.css';
import React, {useState} from "react";
import {saveAs} from 'file-saver';
import 'bootstrap/dist/js/bootstrap.bundle.min';

function App() {

    const [height, setHeight] = useState("");
    const [width, setWidth] = useState("");
    const [arrayType, setArrayType] = useState("");
    const data = JSON.parse(localStorage.getItem('arrayString'));

    const updateHeight = (event) => {
        setHeight(event.target.value);
    };
    const updateWidth = (event) => {
        setWidth(event.target.value);
    };
    const updateArrayType = (event) => {
        setArrayType(event.target.value);
    };

    function sortHandler() {
        if(!arrayType || !height || !width){
            alert("Please, enter all fields");
            return;
        }
        fetch("http://localhost:8001", {
            method : 'POST',
            headers : {
                'Content-Type' : 'application/x-www-form-urlencoded'
            },
            body : "request=" + JSON.stringify({actionType : "pageWrite", arrayType : arrayType, height : height, width : width})
        })
            .then(response => response.text())
            .then(response => {
                localStorage.removeItem('arrayString');
                localStorage.setItem('arrayString', response);
            })
            .catch(err => {
                alert(err);
        });
    }

    function downloadFileHandler() {
        if(!arrayType || !height || !width){
            alert("Please, enter all fields");
            return;
        }
        fetch("http://localhost:8001", {
            method : 'POST',
            headers : {
                'Content-Type' : 'application/x-www-form-urlencoded'
            },
            body : "request=" + JSON.stringify({actionType : "downloadFile", arrayType : arrayType, height : height, width : width})
        })
            .then(response => response.text())
            .then(response => {
                alert(response);
                window.location = response;
            })
            .catch(err => {
                alert(err);
            });
    }

    function writeDBHandler() {
        if(!arrayType || !height || !width){
            alert("Please, enter all fields");
            return;
        }
        fetch("http://localhost:8001", {
            method : 'POST',
            headers : {
                'Content-Type' : 'application/x-www-form-urlencoded'
            },
            body : "request=" + JSON.stringify({actionType : "writeDB", arrayType : arrayType, height : height, width : width})
        })
            .then(response => response.text())
            .then(response => {
                alert(response);
            })
            .catch(err => {
                alert(err);
            });
    }

    function fillLocalStorage(){
        if(!localStorage.getItem('arrayString')){
            localStorage.setItem('arrayString', JSON.stringify([[], []]));
        }
    }

    return (
    <div className="App">
      {fillLocalStorage()}
      <form>
          <input class="numbers" type="number" min="1" value={width} onChange={updateWidth} placeholder={"Width"}></input><br/>
          <input class="numbers" type="number" min="1" value={height} onChange={updateHeight} placeholder={"Height"}></input><br/>
        <select onChange={updateArrayType}>
            <option value="diagonal">Diagonal</option>
            <option value="horizontal">Horizontal</option>
            <option value="snail">Snail</option>
            <option value="snake">Snake</option>
            <option value="vertical">Vertical</option>
        </select><br/>
          <input class="button-28" id="sort" onClick={sortHandler} type="submit" name="Sort" value="Sort" color="Success"></input>
          <input class="button-28" id="download" onClick={downloadFileHandler} type="submit" name="DownloadFile" value="Download File"></input>
          <input class="button-28" id="write" onClick={writeDBHandler} type="submit" name="WriteDB" value="Write to DB"></input>
      </form>
      <table>
          {data.map(column => {
              return <tr>{column.map(row => {
                  return <td>{row}</td>
              })}</tr>;
          })}
      </table>
    </div>
  );
}

export default App;
