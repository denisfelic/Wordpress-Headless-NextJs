"use client";

import { useState } from "react";

export default function Counter() {
  const [count, setCount] = useState(0);

  return (
    <div>
      <input type="hidden" value={count} name="qtd" />
      <p>You clicked {count} times</p>
      <button
        onClick={(e) => {
          e.preventDefault();
          setCount(count + 1);
        }}
      >
        Click me
      </button>
    </div>
  );
}
