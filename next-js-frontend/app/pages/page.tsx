import { serverLog } from "@/src/helpers/log";
import { graphqlClient } from "@/src/lib/graphql-client";
import { gql } from "graphql-request";
import Link from "next/link";

const QUERY_GET_PAGES = gql`
  query Page {
    pages {
      pageInfo {
        hasNextPage
        endCursor
      }
      edges {
        node {
          id
          title
          slug
        }
      }
    }
  }
`;

export default async function Pages() {
  const data: any = await graphqlClient.request(QUERY_GET_PAGES);
  const pages = data.pages.edges

  return (
    <div>
        {pages?.length}
      {pages?.map((page: any) => (
        <div key={page.node.id}>
          <Link href={`/pages/${page.node.slug}`}>{page.node.title}</Link>
        </div>
      ))}
    </div>
  );
}
