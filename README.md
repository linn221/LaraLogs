### About
A simple blog site using Laravel & Bootstrap (Server-side rendering)

#### ER Diagram
[![erd](screenshots/erd.png)](https://drawsql.app/teams/hello-world-20/diagrams/lara-logs)

### Screenshots
<img src="screenshots/1.png" width="700px" />
<img src="screenshots/2.png" width="700px" />
<img src="screenshots/3.png" width="700px" />
<img src="screenshots/4.png" width="700px" />

#### implementations
- created **form requests** for input validation
- use one to one, one to many & many to many **Eloquent relationships**
- create **observers** for deleting image files on deleting related database record
- create **local scope** for querying database
- send email using **queues** and **Mailable** objects
- use **eager loading** to optimize database queries

#### features
- **CRUD** actions for categories, tags, and posts
- images can be added to a post with label
- **soft deleting** blog posts
- allow users to **subscribe to new posts by email**, unsubscribe by URL
- allow to follow a post and **receive emails** on every update to that post