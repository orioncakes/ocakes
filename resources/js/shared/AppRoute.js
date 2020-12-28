import React from "react";
import { Route, withRouter } from "react-router-dom";
import PropTypes from "prop-types";

const AppRoute = ({ component: Component, layout: Layout, ...rest }) => (
    <Route
        {...rest}
        render={props => (
            <React.Fragment>
                <Layout {...props}>
                    <Component {...props} />
                </Layout>
            </React.Fragment>
        )}
    />
);

AppRoute.propTypes = {
    component: PropTypes.any.isRequired,
    layout: PropTypes.any.isRequired,
    path: PropTypes.string.isRequired,
    exact: PropTypes.bool.isRequired,
    rest: PropTypes.any,
    location: PropTypes.any
};

export default AppRoute;
