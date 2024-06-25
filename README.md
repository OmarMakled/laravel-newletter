## Managing Development with Agile Kanban

![Screenshot from 2024-06-25 23-52-49](https://github.com/OmarMakled/laravel-newletter/assets/3720473/bbc6c7f5-35cb-4c78-8f74-c06e86f5b0e1)

**Columns:**
   - **Backlog:** Tasks that need to be done but are not yet started.
   - **To Do:** Tasks that are ready to be started.
   - **In Progress:** Tasks that are currently being worked on.
   - **Code Review:** Tasks that are completed but need to be reviewed.
   - **Testing:** Tasks that have passed code review and are in the testing phase.
   - **Done:** Completed tasks that have passed all stages and are deployed.


**Estimation**

- 2 Full-Stack Developers: Each working on average 5 days a week.
- 1 QA Engineer: Working on average 5 days a week.
- API Development and Front-End Development can be completed in ~6-7 weeks.
- QA and Final Testing can be completed in parallel, ensuring the entire project can be wrapped up within 8 weeks.
- Total Estimated Duration: ~8 weeks

### Code standard & Deploying

- For the frontend, we will use `ESLint` for linting and `Prettier` for code formatting. For the PHP backend, we will use `PHP_CodeSniffer`.

- Husky is used to manage Git hooks and ensure that code style checks are run before commits.

- CI/CD Pipeline with Jenkins.

- Deploying on AWS.

### DB

![Screenshot from 2024-06-25 23-03-43](https://github.com/OmarMakled/laravel-newletter/assets/3720473/8b797455-19f1-4724-93a7-36fc7650b942)

### Docker

![Screenshot from 2024-06-25 23-28-47](https://github.com/OmarMakled/laravel-newletter/assets/3720473/a200a864-c35b-4a1a-9935-a2c4295b16b8)

### Installation

- To start the project you need to run `docker compose up -d` it will pull the images if not exists and spin up the containers.

- Run `make install` to install dependencies if this is the first time.
 🎯

### Process Campaigns

Run make `cron-start`🎯

### API

**Groups**

- Create a new group `POST /api/v1/groups`

```
Request Headers
Include the Admin's authentication token in the Authorization header

Request:
{
  "name": "Travel Lovers",
  "description": "Group for subscribers who enjoy travel stories ...",
}
```

```
Success Response: 201 (Created)
{
	"id": 3,
	"name": "Travel Lovers",
	"content": "Group for subscribers who enjoy travel stories ...",
	"created_at": "2024-06-24T09:00:00",
}
```

**Campaigns**

- Create a new campaign `POST /api/v1/campaigns`

```
Request Headers
Include the Admin's authentication token in the Authorization header

Request:
{
	"name": "New Campaign",
	"content": "Content of the new campaign.",
	"scheduled_at": "2024-07-15T15:00:00",
	"group_ids": [1, 2, 3]  // Array of group IDs to associate with the campaign
}
```

```
Success Response: 201 (Created)
{
	"id": 3,
	"name": "New Campaign",
	"content": "Content of the new campaign.",
	"scheduled_at": "2024-07-15T15:00:00",
	"status": "pending",
	"created_at": "2024-06-24T09:00:00",
	"updated_at": "2024-06-24T09:00:00",
	"groups": [
		{"id": 1, "name": "Classified Subscribers"},
		{"id": 2, "name": "Tech Enthusiasts"},
		{"id": 3, "name": "Fashionistas"}
	]
}
```

- Retrieve a list of campaigns with pagination `GET api/v1/campaigns`

```
Request Headers
Include the Admin's authentication token in the Authorization header
```

```
Success Response: 200 (OK)
{
	"data": [
		{
			"id": 1,
			"name": "Campaign 1",
			"content": "This is the content of Campaign 1.",
			"scheduled_at": "2024-07-01T12:00:00",
			"status": "pending",
			"created_at": "2024-06-20T10:00:00",
			"updated_at": "2024-06-20T10:00:00",
			"groups": [
				{"id": 1, "name": "Classified Subscribers"},
				{"id": 2, "name": "Tech Enthusiasts"}
			]
		},
		{
			"id": 2,
			"name": "Campaign 2",
			"content": "This is the content of Campaign 2.",
			"scheduled_at": null,
			"status": "sent",
			"created_at": "2024-06-18T08:30:00",
			"updated_at": "2024-06-18T08:30:00",
			"groups": [
				{"id": 2, "name": "Tech Enthusiasts"},
				{"id": 4, "name": "Travel Lovers"}
			]
		},
	],
	"current_page": 1,
	"per_page": 10,
	"total": 10
	}
```


- Retrieve reports related to a campaign by ID `GET /api/v1/campaigns/{id}/reports`

```
Request Headers
Include the Admin's authentication token in the Authorization header
```

```
Success Response: 200 (OK)
```

**Newsletter**

- Subscribe the authenticated user to the newsletter using their token `POST /api/v1/newsletter/subscribe`

```
Request Headers
Include the user's authentication token in the Authorization header
```

```
Success Response: 204 No Content
```

- Retrieve a list of subscribers `GET /api/v1/newsletter/subscribers`

```
Request Headers
Include the Admin's authentication token in the Authorization header
```

```
Success Response: 200 (OK)
{
  "data": [
    {
      "id": 1,
      "email": "user1@example.com",
      "created_at": "2023-06-24T12:00:00",
      "updated_at": "2023-06-24T12:00:00",
      ...
    },
    {
      "id": 2,
      "email": "user2@example.com",
      "created_at": "2023-06-24T12:00:00",
      "updated_at": "2023-06-24T12:00:00",
      ....
    },
  ],
  "current_page": 1,
  "per_page": 10,
  "total": 10
}
```

- Add a subscriber to a specific groups using subscriber ID `POST /api/v1/newsletter/subscribers/{subscriber_id}/groups`

```
Request Headers
Include the Admin's authentication token in the Authorization header

Request Body:
{
  "group_ids": [1, 2, 3]  // Array of group IDs to which the subscriber should belong
}
```

```
Success Response: 204 No Content
```
