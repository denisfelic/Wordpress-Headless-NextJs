import r2wc from "@r2wc/react-to-web-component";
import { useCallback, useEffect, useState } from "react";
import ReactFlow, {
  MiniMap,
  Controls,
  Background,
  useNodesState,
  useEdgesState,
  addEdge,
  BackgroundVariant,
} from "reactflow";

import "reactflow/dist/style.css";

const initialNodes = [
  { id: "1", position: { x: 0, y: 0 }, data: { label: "1" } },
  { id: "2", position: { x: 0, y: 100 }, data: { label: "2" } },
];
const initialEdges = [{ id: "e1-2", source: "1", target: "2" }];

function ReactFlowExample() {
  const [nodes, setNodes, onNodesChange] = useNodesState(initialNodes);
  const [edges, setEdges, onEdgesChange] = useEdgesState(initialEdges);

  const onConnect = useCallback(
    (params: any) => setEdges((eds) => addEdge(params, eds)),
    [setEdges]
  );

  const [show, setShow] = useState(false);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    const timeout = setTimeout(() => {
      setLoading(false);
    }, 1500);

    return () => {
      clearTimeout(timeout);
    };
  });

  if (loading) {
    return (
      <div className="mt-5 border">
        <h1>Fake loading... useffect hook testing...</h1>
      </div>
    );
  }

  return (
    <div style={{ width: "100vw", height: "100vh" }}>
      <h1>Welcome to react flow component</h1>
      <button
        className="p-5 border rounded-full"
        onClick={() => setShow(!show)}
      >
        {show ? "Hide" : "Show"}
      </button>
      {show && (
        <ReactFlow
          nodes={nodes}
          edges={edges}
          onNodesChange={onNodesChange}
          onEdgesChange={onEdgesChange}
          onConnect={onConnect}
          fitView
        >
          <Controls />
          <MiniMap />
          <Background variant={BackgroundVariant.Dots} gap={12} size={1} />
        </ReactFlow>
      )}
    </div>
  );
}

export default r2wc(ReactFlowExample, {
  props: {
    data: "json"
  },
});
