export default function AcfReactComponentExample({
  title,
  description,
}: {
  title: string;
  description: string;
}) {
  return (
    <div className="border-y border-white py-10 my-5">
      <small>AcfReactComponentExample</small>
      <h1 className="text-3xl">{title}</h1>
      <div dangerouslySetInnerHTML={{ __html: description }}></div>
    </div>
  );
}
