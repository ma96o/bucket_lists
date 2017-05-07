Rails.application.routes.draw do
  resources :users do
    resources :actions, only: %i(index)
    resources :lists do
      resources :items, only: %i(index)
    end
  end
  resources :items, except: %i(index)
end
