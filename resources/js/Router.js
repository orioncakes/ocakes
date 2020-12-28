import React, { Suspense } from "react";
import { Switch } from "react-router-dom";
// shared
import AdminLayout from "./shared/AdminLayout";
import AppRoute from "./shared/AppRoute";
import LoginLayout from "./shared/LoginLayout";
//components
import Example from "./components/Example";
import DashboardIndex from "./components/Dashboard";
import UserIndex from "./components/User";
const Routes = props => (
    <Suspense fallback={<h1>Loading......</h1>}>
        <Switch>
            <AppRoute
                path="/"
                exact={true}
                component={Example}
                layout={LoginLayout}
            />
            <AppRoute
                path="/home"
                exact={true}
                component={DashboardIndex}
                layout={AdminLayout}
            />
            <AppRoute
                path="/users"
                exact={true}
                component={UserIndex}
                layout={AdminLayout}
            />
        </Switch>
    </Suspense>
);
export default Routes;
