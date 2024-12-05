<style>
.second{
  width: 50%;
  margin-left: auto;
  align-items: center
}
</style>
<!-- Modal -->
<div id="addDataModal" style="width: 50%" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50 first">
  <div class="bg-white dark:bg-dark-card p-6 rounded-lg shadow-lg max-w-lg w-full second">
      <div class="flex justify-between items-center mb-4">
          <h3 class="text-lg font-semibold">Add Data</h3>
          <button id="closeModalButton" class="text-gray-500 hover:text-red-500">
              <i class="ri-close-line text-xl"></i>
          </button>
      </div>
      <form id="addDataForm">
          <div class="mb-4">
              <label for="first_name" class="block text-sm font-medium">First Name</label>
              <input type="text" id="first_name" name="first_name" class="form-input mt-1 w-full" placeholder="Enter first name" required>
          </div>
          <div class="mb-4">
              <label for="last_name" class="block text-sm font-medium">Last Name</label>
              <input type="text" id="last_name" name="last_name" class="form-input mt-1 w-full" placeholder="Enter last name" required>
          </div>
          <div class="mb-4">
              <label for="email" class="block text-sm font-medium">Email</label>
              <input type="email" id="email" name="email" class="form-input mt-1 w-full" placeholder="Enter email" required>
          </div>
          <div class="flex justify-end gap-3">
              <button type="button" id="cancelButton" class="btn b-light">Cancel</button>
              <button type="submit" class="btn btn-primary-light">Save</button>
          </div>
      </form>
  </div>
</div>

<script>
  // Get modal and buttons
  const addDataButton = document.getElementById("addDataButton");
  const addDataModal = document.getElementById("addDataModal");
  const closeModalButton = document.getElementById("closeModalButton");
  const cancelButton = document.getElementById("cancelButton");
  const addDataForm = document.getElementById("addDataForm");

  // Open modal
  addDataButton.addEventListener("click", () => {
      addDataModal.classList.remove("hidden");
  });

  // Close modal
  const closeModal = () => {
      addDataModal.classList.add("hidden");
  };
  closeModalButton.addEventListener("click", closeModal);
  cancelButton.addEventListener("click", closeModal);

  // Handle form submission
  addDataForm.addEventListener("submit", (e) => {
      e.preventDefault();

      // Get form data
      const formData = new FormData(addDataForm);
      const data = Object.fromEntries(formData);

      // Optional: Send data to the server (AJAX request)
      fetch("/lfcms/administrator", {
          method: "POST",
          headers: {
              "Content-Type": "application/json",
              "X-CSRF-TOKEN": "{{ csrf_token() }}", // Include CSRF token for Laravel
          },
          body: JSON.stringify(data),
      })
          .then((response) => {
              if (!response.ok) {
                  throw new Error("Failed to add data");
              }
              return response.json();
          })
          .then((data) => {
              alert("Data added successfully!");
              closeModal();
              location.reload(); // Reload page to update data (optional)
          })
          .catch((error) => {
              console.error("Error:", error);
              alert("An error occurred. Please try again.");
          });
  });
</script>
