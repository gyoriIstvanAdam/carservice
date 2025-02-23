const Ziggy = {"url":"http:\/\/carservice.test","port":null,"defaults":{},"routes":{"Home":{"uri":"\/","methods":["GET","HEAD"]}}};
if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
  Object.assign(Ziggy.routes, window.Ziggy.routes);
}
export { Ziggy };
