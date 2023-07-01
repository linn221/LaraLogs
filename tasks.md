### Functions
* [x] migration table category, logs
* [x] CRUD category, CRUD logs
* [x] validation, repopulation, error messages
* [x] relationship, ($log->category instead of $log->category_id)

### Refactor
* [ ]

### Features
* [ ] pagination
* [x] filter by category
* [x] search
* [ ] sort by id, updated, created, title
* [ ] sort by id, updated, created, title (for category)
* [ ] soft deleting, have a bin for admin to recycle or permentally delete
* [ ] deleting a category will give an option to delete related logs, or put them into archived
* [ ] add tags, of course

### Bugs
* [ ] bootstrap-icons not working

### UI 
* [x] show validation errors
* [x] view files for category
* [x] view files for logs
* [x] show something for empty cases
* [x] autofocus input
* [ ] convert select box to radio buttons (selecting category)
* [x] clicking a category will go to log listing page, filtered by that selected category
* [ ] icons instead of dumb text