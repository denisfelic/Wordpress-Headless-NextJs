import AcfMySecondBlock from "../components/AcfMySecondBlock";
import AcfReactComponentExample from "../components/AcfReactComponentExample";

export default function DynamicBlocksRender({
  typename,
  blockProps,
}: {
  typename: string;
  blockProps: any;
}) {
  const blocks = {
    AcfReactComponentExample: <AcfReactComponentExample {...blockProps} />,
    AcfMySecondBlock: <AcfMySecondBlock {...blockProps} />,
  };

  return <>{blocks[typename as keyof typeof blocks] ?? <></>}</>;
}
