
import lodash from "./lodash";
import colors from "./colors";
import helper from "./helper";


export default (app) => {
	app.use(lodash);
	app.use(helper);
	app.use(colors);
};
