terraform {
  backend "remote" {
    organization = "YOUR_ORG"

    workspaces {
      name = "YOUR_WORKSPACE"
    }
  }
}
