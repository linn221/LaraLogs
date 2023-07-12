### Functions
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
* [@] create components for each log, detail log
* [!] delete image files on database delete
* [!] edit iamges
* [ ] order by column
* [!] don't give guest users write access to resources
* [@] access control, middleware, authorization, etc

### Refactor
* [ ] Eager loading for category of log

### Features
* [x] add status
* [ ] fileter by updated, created date
* [ ] sort by id, updated, created, title
* [ ] sort by id, updated, created, title (for category)
* [ ] soft deleting, have a bin for admin to recycle or permentally delete
* [ ] deleting a category will give an option to delete related logs, or put them into archived
* [ ] add remove image button
* [ ] return to index page after editing a log, tags/$id, or categories/$id, needs a way to store that info elegantly
* [ ] hightlight matched strings in searching logs
* [ ] add slug
* [ ] add visitors
* [ ] previous, next button on show page

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
* [ ] a log having duplicate tags, validation or something
* [ ] strained foreign key relationship, on casacade
* [@] admin index, banner not showing because of updated url

### UI 
* [x] show validation errors
* [x] view files for category
* [x] view files for logs
* [x] show something for empty cases
* [x] autofocus input
* [x] convert select box to radio buttons (selecting category)
* [x] clicking a category will go to log listing page, filtered by that selected category
* [x] icons instead of dumb text
* [x] pagination links at the top, aligned right with search bar
* [x] add edit button in show page
* [!] update hyper links (using component)
* [@] informative action status
* [ ] inform how many items are found with search
* [ ] show the log once clicked on the title
* [ ] don't let guest users see admin tasks
* [ ] icons at nav-bar and other relevant places
* [ ] show status like 'logs under linux or frontend', 'showing logs by query' at index listing page
* [ ] ugly pagination UI

### Wonder
* [ ] add private attributes in controller class??
* [@] fonts.bunny.net, makes my browser diffcult to load, for some reason