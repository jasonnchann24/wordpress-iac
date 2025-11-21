resource "vultr_instance" "wordpress" {
  hostname    = var.hostname
  label       = var.label
  region      = var.region
  plan        = var.plan
  os_id       = var.os_id
  ssh_key_ids = [var.cloud_ssh_pub_key_id]

  user_data = templatefile("${path.module}/cloud-init.tpl", {
    public_key = var.ssh_pub_key
  })
}

output "wordpress_ip" {
  description = "Public IP of the WordPress server"
  value       = vultr_instance.wordpress.main_ip
}
