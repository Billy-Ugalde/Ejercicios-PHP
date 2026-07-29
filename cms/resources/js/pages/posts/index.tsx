import { Form, Head } from '@inertiajs/react';
import { ImageOff } from 'lucide-react';
import PostController from '@/actions/App/Http/Controllers/PostController';
import Heading from '@/components/heading';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import {
    Dialog,
    DialogClose,
    DialogContent,
    DialogFooter,
    DialogTitle,
    DialogTrigger,
} from '@/components/ui/dialog';
import {
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from '@/components/ui/table';
import { index } from '@/routes/posts';

type Post = {
    id: number;
    title: string;
    image: string | null;
    created_at: string;
    updated_at: string;
    user: {
        id: number;
        name: string;
    };
};

export default function PostsIndex({ posts }: { posts: Post[] }) {
    return (
        <>
            <Head title="Posts" />

            <div className="flex h-full flex-1 flex-col gap-4 p-4">
                <Heading
                    title="Posts"
                    description="Manage all posts in the system"
                />

                <Card>
                    <CardHeader>
                        <CardTitle>All Posts</CardTitle>
                    </CardHeader>
                    <CardContent>
                        <Table>
                            <TableHeader>
                                <TableRow>
                                    <TableHead>Id</TableHead>
                                    <TableHead>Owner</TableHead>
                                    <TableHead>Title</TableHead>
                                    <TableHead>Image</TableHead>
                                    <TableHead>Created At</TableHead>
                                    <TableHead>Updated At</TableHead>
                                    <TableHead className="text-right">
                                        Delete
                                    </TableHead>
                                </TableRow>
                            </TableHeader>
                            <TableBody>
                                {posts.map((post) => (
                                    <TableRow key={post.id}>
                                        <TableCell>{post.id}</TableCell>
                                        <TableCell>{post.user.name}</TableCell>
                                        <TableCell>{post.title}</TableCell>
                                        <TableCell>
                                            {post.image ? (
                                                <img
                                                    src={post.image}
                                                    alt=""
                                                    className="h-12 w-12 rounded object-cover"
                                                />
                                            ) : (
                                                <ImageOff className="size-5 text-muted-foreground" />
                                            )}
                                        </TableCell>
                                        <TableCell>
                                            {new Date(
                                                post.created_at,
                                            ).toLocaleDateString()}
                                        </TableCell>
                                        <TableCell>
                                            {new Date(
                                                post.updated_at,
                                            ).toLocaleDateString()}
                                        </TableCell>
                                        <TableCell className="text-right">
                                            <Dialog>
                                                <DialogTrigger asChild>
                                                    <Button
                                                        variant="destructive"
                                                        size="sm"
                                                    >
                                                        Delete
                                                    </Button>
                                                </DialogTrigger>
                                                <DialogContent>
                                                    <DialogTitle>
                                                        Delete "{post.title}"?
                                                    </DialogTitle>
                                                    <Form
                                                        {...PostController.destroy.form(
                                                            post.id,
                                                        )}
                                                        options={{
                                                            preserveScroll: true,
                                                        }}
                                                    >
                                                        {({ processing }) => (
                                                            <DialogFooter className="gap-2">
                                                                <DialogClose
                                                                    asChild
                                                                >
                                                                    <Button variant="secondary">
                                                                        Cancel
                                                                    </Button>
                                                                </DialogClose>
                                                                <Button
                                                                    variant="destructive"
                                                                    disabled={
                                                                        processing
                                                                    }
                                                                    type="submit"
                                                                >
                                                                    Delete
                                                                </Button>
                                                            </DialogFooter>
                                                        )}
                                                    </Form>
                                                </DialogContent>
                                            </Dialog>
                                        </TableCell>
                                    </TableRow>
                                ))}
                            </TableBody>
                        </Table>
                    </CardContent>
                </Card>
            </div>
        </>
    );
}

PostsIndex.layout = {
    breadcrumbs: [
        {
            title: 'Posts',
            href: index(),
        },
    ],
};
