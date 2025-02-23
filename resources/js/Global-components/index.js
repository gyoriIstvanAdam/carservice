
import Paginator from './paginator/paginator.vue';
import PaginatorAlter from './paginator/paginator_alter.vue';
import LucideIcons from "./lucide";

export default (app)=> {
	app.component("paginator", Paginator);
    app.component("paginatorAlter", PaginatorAlter);

	for (const [key, icon] of Object.entries(LucideIcons)) {
		app.component(key, icon);
	}
}