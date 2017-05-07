class ItemsController < ApplicationController
  layout 'application_prof', except: %i(trend)

  before_action :get_user, only: %i(index success trash)
  before_action :get_list, only: %i(index)

  def index
    @lists = @user.lists
    @items = @list.items
  end

  def success
    @items = @user.items.where(status: 2)
  end

  def trash
    @items = @user.items.where(status: 3)
  end

  def trend
    @items = Item.all
    @genre = params[:hot_new]
  end

  private
    def get_user
      @user = User.find(params[:user_id])
    end

    def get_list
      @list = List.find(params[:list_id])
    end
end
