import React from "react";

class Button extends React.Component {
    constructor(props) {
        super(props);
        this.props = props;
    }

    render() {
        if(this.props.array){
            let parsedArray = JSON.parse(this.props.array);
            return (
                <table>
                    {parsedArray.map(column => {
                        return <tr>{column.map(row => {
                            return <td>{row}</td>
                        })}</tr>;
                    })}
                </table>
            );
        }else{
            return this.props.array;
        }
    }
}

export default Button;
