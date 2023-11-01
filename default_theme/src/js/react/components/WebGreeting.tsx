import React, { useCallback, useEffect, useState } from "react";
import r2wc from "@r2wc/react-to-web-component";

type GreetingProps = {
  data: {
    title: string;
    description: string;
  };
};
const Greeting = ({ data }: GreetingProps) => {
  const { title, description } = data;

  return (
    <div>
      <Counter />
      <h1>Title: {title}</h1>
      <div>
        <strong>Description:</strong>
        <div dangerouslySetInnerHTML={{ __html: description }} />
      </div>
    </div>
  );
};

const WebGreeting = r2wc(Greeting, {
  props: {
    data: "json",
  },
});

export default WebGreeting;

const Counter = () => {
  const [count, setCount] = useState(0);

  const increment = () => setCount((prev) => (prev += 1));
  const decrement = () => setCount((prev) => (prev -= 1));

  return (
    <div className="p-5 border">
      <h2>Count {count}</h2>
      <div className="flex gap-[32px]">
        <button
          className="p-5 text-lg font-semibold text-white rounded-full bg-purple-gradient"
          onClick={decrement}
        >
          Decrement
        </button>
        <button
          className="p-5 text-lg font-semibold text-white rounded-full bg-purple-gradient"
          onClick={increment}
        >
          Increment
        </button>
      </div>
    </div>
  );
};

