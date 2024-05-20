describe('Authentication', () => {
  it('should not be accessible to a user, when trying visit secure page without login', () => {
    cy.refreshDatabase()
    cy.seed()

    cy.visit('/posts').assertRedirect('/login')
  })

  it('shows error on login with invalid email', () => {
    cy.refreshDatabase()
    cy.seed()

    cy.visit('/login')

    cy.get('#email').type('notfound@example.com')
    cy.get('#password').type('password')

    cy.contains('button', 'Login').click()

    cy.contains('The selected email is invalid.')
  })

  it('shows error on login with invalid password', () => {
    cy.refreshDatabase()
    cy.seed()

    cy.visit('/login')

    cy.get('#email').type('test@example.com')
    cy.get('#password').type('password12')

    cy.contains('button', 'Login').click()

    cy.contains('Incorrect password')
  })

  it('user can login with valid credentials', () => {
    cy.refreshDatabase()
    cy.seed()

    cy.visit('/login')

    cy.get('#email').type('test@example.com')
    cy.get('#password').type('password')

    cy.contains('button', 'Login').click()
  })

  it('should not be accessible to a user, when trying visit login page while already logged in', () => {
    cy.refreshDatabase()
    cy.seed()

    cy.visit('/login')

    cy.get('#email').type('test@example.com')
    cy.get('#password').type('password')

    cy.contains('button', 'Login').click()

    cy.visit('/login').assertRedirect('/')
  })

  it('user can logout', () => {
    cy.refreshDatabase()
    cy.seed()

    cy.visit('/login')

    cy.get('#email').type('test@example.com')
    cy.get('#password').type('password')

    cy.contains('button', 'Login').click()

    cy.contains('a', 'Logout').click().assertRedirect('/login')
  })
})
