terraform {
  required_providers {
    vultr = {
      source  = "vultr/vultr"
      version = "2.27.1"
    }
  }
}

provider "vultr" {
  api_key = var.vultr_api_key != "" ? var.vultr_api_key : getenv("VULTR_API_KEY")
}
