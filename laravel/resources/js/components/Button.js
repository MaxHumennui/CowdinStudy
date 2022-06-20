import React from "react";

class Button extends React.Component {
    constructor(props) {
        super(props);
        this.props = props;
    }

    render() {
        return (
            <button className="button" onClick={this.props.handler} type="submit">
                {this.props.name}
            </button>
        );
    }
}

export default Button;
