import ReactFlowComponent from "./react/components/ReactFlowComponent";
import WebGreeting from "./react/components/WebGreeting";

export default function registerComponents() {
    customElements.define("x-web-greeting", WebGreeting)
    customElements.define("x-react-flow", ReactFlowComponent);
}
