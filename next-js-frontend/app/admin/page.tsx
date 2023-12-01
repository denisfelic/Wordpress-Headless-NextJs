import prisma from "@/src/prisma-client";
import { User } from "@prisma/client";
import { revalidatePath } from "next/cache";
import { useState } from "react";
import Counter from "./counter";

async function getUsers() {
  const users = await prisma.user.findMany();
  return users;
}

export default async function AdminPage() {
  async function createUser(formData: FormData) {
    "use server";

    const payload = {
      name: `${formData.get("name")}-${formData.get("qtd")}` ,
      email: `${formData.get("email")}-${formData.get("qtd")}` ,
    };

    if (!payload.name || !payload.email) {
      return;
    }

    try {
      await prisma.user.create({
        data: {
          name: payload.name as string,
          email: payload.email as string,
        },
      });
      revalidatePath("/admin");
      console.log("User created");
    } catch (error) {
      console.log(error);
    }
  }

  const users = await getUsers();

  return (
    <div className="grid place-items-center h-screen w-screen">
      <PageForm users={users} createUser={createUser} />
    </div>
  );
}

const PageForm = ({
  users,
  createUser,
}: {
  users: User[];
  createUser(formData: FormData): Promise<void>;
}) => {
  return (
    <div>
      <div>
        <div>
          <div>
            <div className="grid grid-cols-2 gap-5">
              <div>Name</div>
              <div>Email</div>
            </div>
          </div>
          <div className="">
            {users.map((user) => (
              <div className="grid grid-cols-2 gap-5" key={user.id}>
                <div>{user.name}</div>
                <div>{user.email}</div>
              </div>
            ))}
          </div>
        </div>
        <h1 className="mt-10">Create new user</h1>
        <form className="flex flex-col gap-2 max-w-md" action={createUser}>
          <Counter />
          <input
            className="p-3 rounded-md text-black"
            type="text"
            name="name"
            placeholder="Name"
          />
          <input
            className="p-3 rounded-md text-black"
            type="text"
            name="email"
            placeholder="Email"
          />
          <button className="border p-3 rounded-md" type="submit">
            Create
          </button>
        </form>
      </div>
    </div>
  );
};
