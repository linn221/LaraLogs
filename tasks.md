### Functions
* [x] move UploadImage code to ImageController
* [x] delete image file on delete
* [x] migration table category, logs
* [x] CRUD category, CRUD logs
* [x] validation, repopulation, error messages
* [x] relationship, ($log->category instead of $log->category_id)
* [x] seeding
* [x] add routes for CRUD actions of tags
* [x] add tags, of course
* [x] filter by tag
* [x] add iamges
* [x] pagination
* [x] filter by category
* [x] search
* [x] distinct admin routes and reader route
* [x] edit iamges
* [x] subscribe email
        emails table => verified, cancled, email address, Name, new post noti
* [x] cancel scription
* [x] follow a log, by email, will send an update to the post by email
        follows => emails id, post id
* [x] use queue for sending email
* [l] verify email, then comment as a user
* [l] comement anonymously first

### Refactor
* [l] Eager loading for category of log (Optimize database query)
* [l] every email object has default value for token

### Features
* [x] add status
* [bl] admin listing the subscribers, getting notified by email on config settings, schedule or every subscribe
* [l] add update title and text box for added paragraph, store the input with ** edit, and timestamp
* [l] user profile, image, bio, a public one, and a private editable one
* [x] fileter by updated, created date
* [x] sort by id, updated, created, title
* [x] sort by id, updated, created, title (for category)
* [x] soft deleting, have a bin for admin to recycle or permentally delete
        add restore on status alert
* [f] deleting a category will give an option to delete related logs, or put them into archived
* [l] return to index page after editing a log, tags/$id, or categories/$id, needs a way to store that info elegantly
* [f] hightlight matched strings in searching logs
* [@] add slug
* [f] shorten url to edit a post from the public page
* [l] add visitors
* [l] sort logs by watch count

### Bugs
* [x] bootstrap-icons not working
        (add '.css' extension at import statement)
* [x] url queries not including multiple values
* [x] query builder when not running in showLog actions
        (fixed by logical grouping, add paratentises in `where $con (where $con2 or where $con3)`)
* [x] logs pointing to non-existent category
* [x] 2 identical records showing at tags/5
        (cuased by a log having the same tag multiple times, seeder code, and needs to validate or something as well)
* [x] deleting the first item no matter which delete button is clicked
        (delete forms having the same id for different items)

### Fix
* [x] add restore button, visitor button
* [ ] validation for subscribing a post
* [l] email unsubscribe link pointing to localhost, instead of 127.0.0.1
        something to do with queuing, which i cannot mind right now
* [l] a log having duplicate tags, validation or something
* [l] strained foreign key relationship, on casacade
* [x] make sorting link dynamic to current url
* [x] query getting their path lost, sorting 
* [x] admin index, banner not showing because of updated url
* [x] redirect to /home after authenticated, might have to redirect /home to /dashboard/home, but im not sure
        *edit, just create a route /home, after all, im not even sure the point of it
* [bl] many to many relationship, not casacding
* [bl] input lost when uploading image

### UI 
* [x] show validation errors
* [x] view files for category
* [x] show something for empty cases
* [x] view files for logs
* [x] autofocus input
* [x] convert select box to radio buttons (selecting category)
* [x] clicking a category will go to log listing page, filtered by that selected category
* [x] icons instead of dumb text
* [x] pagination links at the top, aligned right with search bar
* [x] add edit button in show page
* [x] update hyper links (using component)
* [x] informative action status
* [x] inform how many items are found with search
* [x] show the log once clicked on the title
* [x] don't let guest users see admin tasks
* [x] show status like 'logs under linux or frontend', 'showing logs by query' at index listing page
* [x] dashboard link will have category, and tag resource links, and tidy the main nav bar
* [d] ugly pagination UI
* [d] create components for each log, detail log
* [x] different for humans timestamp

### Wonder
* [ ] add private attributes in controller class??
