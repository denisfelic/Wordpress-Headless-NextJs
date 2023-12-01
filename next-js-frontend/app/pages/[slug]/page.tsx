import { PageProps } from "@/.next/types/app/layout";
import DynamicBlocksRender from "@/src/blocks-setup/DynamicBlocksRender";
import { getClient } from "@/src/lib/apolloClient";
import { gql } from "@apollo/client";
import { uuid } from "uuidv4";

const GET_PAGE_QUERY = gql`
  query Page($pageId: ID!, $idType: PageIdType) {
    page(id: $pageId, idType: $idType) {
      id
      slug
      title
      editorBlocks(flat: false) {
        ... on AcfMySecondBlock {
          exampleBlock2 {
            textos {
              titulo
            }
            taxq {
              edges {
                node {
                  name
                  slug
                }
              }
            }
          }
        }
        ... on AcfReactComponentExample {
          reactBlockExample {
            title
            __typename
            description
          }
        }
      }
    }
  }
`;

export default async function Page({ params }: PageProps) {
  const { slug } = params;

  const { data } = await getClient().query({
    query: GET_PAGE_QUERY,
    variables: {
      pageId: slug,
      idType: "URI",
    },
  });

  const page = data?.page;
  return (
    <div>
      <h1>{page?.title}</h1>
      <h2>Blocks</h2>
      <div>
        {page?.editorBlocks.map((block: any) => {
          const propsKey = Object.keys(block ?? {})[1];
          const props = block[propsKey];

          return (
            <DynamicBlocksRender
              key={uuid()}
              typename={block.__typename}
              blockProps={props}
            />
          );
        })}
      </div>
    </div>
  );
}
