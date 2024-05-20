describe('Navigation', () => {
  it('should visit / on clicking Home button', () => {
    cy.visit('/')

    cy.contains('a', 'Home').click().assertRedirect('/')
  })

  it('should visit /login on clicking Login button', () => {
    cy.visit('/')

    cy.contains('a', 'Login').click().assertRedirect('/login')
  })

  it('should visit /posts on clicking Posts button', () => {
    cy.refreshDatabase()
    cy.seed()

    cy.login({ email: 'test@example.com' })

    cy.visit('/')

    cy.contains('a', 'Posts').click().assertRedirect('/posts')
  })

  it('should visit /posts/create on clicking Create post button', () => {
    cy.refreshDatabase()
    cy.seed()

    cy.login({ email: 'test@example.com' })

    cy.visit('/posts')

    cy.contains('a', 'Create post').click().assertRedirect('/posts/create')
  })

  it('should visit /posts on clicking Back button', () => {
    cy.refreshDatabase()
    cy.seed()

    cy.login({ email: 'test@example.com' })

    cy.visit('/posts/create')

    cy.contains('a', 'Back').click().assertRedirect('/posts')
  })
})
