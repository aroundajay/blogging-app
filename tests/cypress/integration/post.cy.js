describe('Blog post', () => {
  it('should vist the post list page', () => {
    cy.refreshDatabase()
    cy.seed()

    cy.login({ email: 'test@example.com' })

    cy.visit('/posts')

    cy.contains('Your Blog Posts')
    cy.contains('a', 'Create post')
  })

  it('should create post', () => {
    cy.refreshDatabase()
    cy.seed()

    cy.login({ email: 'test@example.com' })
    cy.visit('/posts')
    cy.contains('a', 'Create post').click().assertRedirect('/posts/create')

    cy.get('#title').type('My test post.')
    cy.get('#content').type('My test post content')

    cy.contains('button', 'Create').click().assertRedirect('/posts')
    cy.contains('My test post.')
    cy.contains('My test post content')
  })

  it('should update post', () => {
    cy.refreshDatabase()

    cy.login({ id: 1, email: 'test@example.com' })
    cy.create({
        model: 'App\\Models\\Post',
        attributes: {
            id: 1,
            user_id: 1
        }
    });
    cy.visit('/posts')

    cy.contains('button', 'Edit').click().assertRedirect(`/posts/1/edit`)
    cy.get('#title').clear().type('My test post.')
    cy.get('#content').clear().type('My test post content')

    cy.contains('button', 'Update').click().assertRedirect('/posts')
    cy.contains('My test post.')
    cy.contains('My test post content')
  })

  it('should delete post', () => {
    cy.refreshDatabase()

    cy.login({ id: 1, email: 'test@example.com' })
    cy.create({
        model: 'App\\Models\\Post',
        attributes: {
            user_id: 1
        }
    });
    cy.visit('/posts')

    cy.contains('button', 'Delete').click().assertRedirect('/posts')
    cy.contains('button', 'Delete').should('not.exist')
  })
})
