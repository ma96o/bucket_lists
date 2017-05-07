Rails.application.routes.draw do
  resources :users do
    resources :actions, only: %i(index)
    resources :lists do
      resources :items, only: %i(index)
    end
  end
  resources :items, except: %i(index)

  get 'users/:user_id/success' => 'items#success'
  get 'users/:user_id/trash' => 'items#trash'
  get 'items/trend/:hot_new' => 'items#trend'
end
