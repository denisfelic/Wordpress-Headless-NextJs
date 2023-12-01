"use client";
import { useEffect, useState } from "react";

interface Node {
  name: string;
  slug: string;
}

interface Edge {
  node: Node;
}

interface Taxq {
  edges: Edge[];
}

interface AcfMySecondBlock {
  textos: {
    titulo: string;
  }[];
  taxq: Taxq;
}

export default function AcfMySecondBlock({ textos, taxq }: AcfMySecondBlock) {
  const [counter, setCounter] = useState(0);

  useEffect(() => {
    console.log(textos, taxq);
  }, [textos, taxq]);

  return (
    <div className="border-y border-white py-10 my-5">
      <big>Counter {counter}</big>
      <small>AcfMySecondBlock</small>
      <ul>
        {textos.map((text: any, index: number) => (
          <li key={index}>{text.titulo}</li>
        ))}
      </ul>
      Tax Q
      {taxq.edges.map((el, key) => {
        return (
          <li key={key}>
            Name: {el.node.name}
            slug: {el.node.slug}
          </li>
        );
      })}
      <button
        className="p-2 rounded-lg border border-white"
        onClick={() => setCounter(counter + 1)}
      >
        Increment
      </button>
    </div>
  );
}
